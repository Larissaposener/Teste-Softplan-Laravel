import { Component, OnInit } from '@angular/core';
import { BoloService } from 'src/app/app.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-usuario-interessado',
  templateUrl: './usuario-interessado.component.html',
  styleUrls: ['./usuario-interessado.component.css']
})


export class UsuarioInteressadoComponent implements OnInit {
  bolos: any[] = [];  

  constructor(private boloService: BoloService, private router: Router) { }

  ngOnInit(): void {
   
    this.boloService.bolosdisponiveis().subscribe(data => {
      this.bolos = data;
      console.log(data); 
    });
  }


  data: any

  form = new FormGroup({
    nome: new FormControl('', Validators.required),  
    email: new FormControl('', [Validators.required, Validators.email]),  
    bolo_ids: new FormControl([], Validators.required)  
  });

  submit2() {
    
    this.data = this.form.value;

      console.log(this.data)
    this.boloService.createInteressado(this.data).subscribe(data => {
      
      this.form.reset();
      alert('interesse cadastrado');
      this.router.navigate(['/interessado']);
      
    });
  }

}
