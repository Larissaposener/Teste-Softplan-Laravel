import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AddBoloComponent } from './components/add-bolo/add-bolo.component';
import { UpdateboloComponent } from './components/update-bolo/update-bolo.component';
import { ViewboloComponent } from './components/view-bolo/view-bolo.component';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { UsuarioInteressadoComponent } from './components/usuario-interessado/usuario-interessado.component';

@NgModule({
  declarations: [
    AppComponent,
    AddBoloComponent,
    UpdateboloComponent,
    ViewboloComponent,
    UsuarioInteressadoComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
