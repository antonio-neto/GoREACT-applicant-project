import { Component, OnInit } from '@angular/core';
import { FileCrudService } from 'src/app/services/file-crud.service';
import { File } from '../../models/file.class';

@Component({
  selector: 'app-files-list',
  templateUrl: './files-list.component.html',
  styleUrls: ['./files-list.component.css']
})
export class FilesListComponent implements OnInit {
  files: File[];

  constructor(private fileCrudService: FileCrudService) { }

  async ngOnInit() {
    this.files = await this.fileCrudService.getFiles();
  }

}
