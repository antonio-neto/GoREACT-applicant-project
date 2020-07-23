import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { File } from '../models/file.class';

@Injectable({
  providedIn: 'root'
})
export class FileCrudService {
  apiUrl: string;
  constructor(private http: HttpClient) {
    this.apiUrl = `${environment.resourceUrl}${environment.apiUrl}/file`;
  }

  async getFiles(searchTerm: string): Promise<File[]> {
    return this.http.get<File[]>(this.apiUrl + '?search=' + searchTerm).toPromise();
  }

  async addFile(formData: FormData, headers: HttpHeaders) {
    return this.http.post(this.apiUrl, formData, { headers }).toPromise();
  }

  async deleteFile(file: File) {
    return this.http.delete(`${this.apiUrl}/${file.id}/${file.savedName}`).toPromise();
  }
}
