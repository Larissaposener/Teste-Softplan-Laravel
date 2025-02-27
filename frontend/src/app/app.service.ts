import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { bolo } from './bolo';

import { Interessado } from './Interessado';
import { map } from 'rxjs/operators'; 

@Injectable({
  providedIn: 'root'
})
export class BoloService {
  private url: string = 'http://localhost:8000/api/bolos/';
  private urldisponiveis: string = 'http://localhost:8000/api';


  constructor(private http: HttpClient) { }

  
  addBolo(bolo: bolo): Observable<bolo> {
    return this.http.post<bolo>(this.url, bolo);
  }

 
  getBolos(): Observable<bolo[]> {
    return this.http.get<any>(this.url).pipe(
      map(response => response.data)
    );
  }

  getBolo(id: number): Observable<bolo> {
    return this.http.get<{ data: bolo }>(`${this.url}${id}`).pipe(
      map(response => {
        // Retorna o conteúdo da chave 'data'
        return response.data;
      })
    );
  }


  updateBolo(id: number, bolo: bolo): Observable<bolo> {
    return this.http.put<bolo>(`${this.url}${id}/`, bolo);
  }


  deleteBolo(id: number): Observable<bolo> {
    return this.http.delete<bolo>(`${this.url}${id}/`);
  }


  bolosdisponiveis(): Observable<bolo[]> {
  
    const urlCompleta = `${this.urldisponiveis}/bolos-disponiveis`; 
    return this.http.get<any>(urlCompleta).pipe(
      map(response => response.data)  
    );
  }

 
  createInteressado(interessado: Interessado): Observable<Interessado> {

    const urlCompleta = `${this.urldisponiveis}/interessado/create`;

    return this.http.post<Interessado>(urlCompleta, interessado);
  }

 
  


}
