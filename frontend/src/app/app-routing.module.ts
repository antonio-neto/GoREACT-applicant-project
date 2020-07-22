import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FilesListComponent } from './files/files-list/files-list.component';

const routes: Routes = [
  {path: '', component: FilesListComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
