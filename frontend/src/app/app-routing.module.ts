import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AddBoloComponent } from './components/add-bolo/add-bolo.component';
import { UpdateboloComponent } from './components/update-bolo/update-bolo.component';
import { ViewboloComponent } from './components/view-bolo/view-bolo.component';
import { UsuarioInteressadoComponent } from './components/usuario-interessado/usuario-interessado.component';

const routes: Routes = [
  { path: '', component: ViewboloComponent },
  { path: 'add', component: AddBoloComponent },
  { path: 'update/:id', component: UpdateboloComponent},
  { path: 'interessado', component: UsuarioInteressadoComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
