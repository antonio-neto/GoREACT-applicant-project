import { TestBed } from '@angular/core/testing';

import { FileCrudService } from './file-crud.service';

describe('FileCrudService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: FileCrudService = TestBed.get(FileCrudService);
    expect(service).toBeTruthy();
  });
});
