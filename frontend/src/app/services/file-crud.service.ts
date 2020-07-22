import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '../../environments/environment';
import { File } from '../models/file.class';

@Injectable({
  providedIn: 'root'
})
export class FileCrudService {

  constructor(private http: HttpClient) { }

  async getFiles(): Promise<File[]> {
    return this.http.get<File[]>(environment.apiUrl + '/file').toPromise();
  }
}
