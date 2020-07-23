import { Component, OnInit } from '@angular/core';
import { FileCrudService } from 'src/app/services/file-crud.service';
import { File } from '../../models/file.class';
import { HttpHeaders } from '@angular/common/http';
import { NgForm } from '@angular/forms';
import { environment } from '../../../environments/environment';

@Component({
  selector: 'app-files-list',
  templateUrl: './files-list.component.html',
  styleUrls: ['./files-list.component.css']
})
export class FilesListComponent implements OnInit {
  files: File[];
  filedata: any;
  showErrorMessageFileType = false;
  filesUrl = `${environment.resourceUrl}${environment.filesFolder}/`;
  jpegFileType = 'image/jpeg';

  constructor(private fileCrudService: FileCrudService) { }

  async ngOnInit() {
    await this.getFiles();
  }

  async getFiles() {
    this.files = await this.fileCrudService.getFiles();
  }

  async onSubmit(form: NgForm) {
    const formData = new FormData();
    const headers = new HttpHeaders();
    headers.append('Content-Type', 'multipart/form-data');
    headers.append('Accept', 'application/json');
    formData.append('file', this.filedata);
    formData.append('title', form.controls.title.value);
    formData.append('description', form.controls.description.value);
    formData.append('tags', form.controls.tags.value);
    if (!this.filedata) {
      this.showErrorMessageFileType = true;
      return;
    }
    const validateResult = this.validContentType(this.filedata.type);
    this.showErrorMessageFileType = !validateResult;
    if (validateResult) {
      await this.fileCrudService.addFile(formData, headers);
      await this.getFiles();
      form.reset();
    }
  }

  fileEvent(e: any) {
      this.filedata = e.target.files[0];
  }

  async removeFile(file: File) {
    await this.fileCrudService.deleteFile(file);
    await this.getFiles();
  }

  validContentType(fileType: string): boolean {
    return fileType === undefined || (fileType !== this.jpegFileType && fileType !== 'video/mp4') ? false : true;
  }
}
