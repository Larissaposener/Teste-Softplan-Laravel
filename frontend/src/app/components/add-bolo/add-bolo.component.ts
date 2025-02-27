import { Component } from '@angular/core';
import { BoloService } from 'src/app/app.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-add-bolo',
  templateUrl: './add-bolo.component.html',
  styleUrls: ['./add-bolo.component.css']
})
export class AddBoloComponent {
  
    constructor(private service: BoloService, private router: Router) { }
  
    ngOnInit(): void {
    }

    data: any
    showError = false


    form = new FormGroup({
      nome: new FormControl('', Validators.required),
      valor: new FormControl('', [
        Validators.required,
        Validators.pattern('^[0-9]+(\.[0-9]{1,2})?$')
      ]), 
      
      peso: new FormControl('', [
        Validators.required,
        Validators.pattern('^[0-9]+(\.[0-9]{1,2})?$') 
      ]),     
      
      
      quantidade_disponivel: new FormControl('', [Validators.required, Validators.min(0)])
    });

    addBolo() {

      this.data = this.form.value;
      console.log(this.data)
      this.data.peso = parseFloat(this.data.peso.replace(',', '.'));   
        this.data.valor = parseFloat(this.data.valor.replace(',', '.'));
      this.service.addBolo(this.data).subscribe({
        next: (response) => {
          
          this.router.navigate(['/']);
        },
        error: (error) => {
          console.error('Erro ao adicionar o bolo:', error); 
  
          this.showError = true;
  
          setTimeout(() => {
            this.showError = false;
          }, 5000); 
        }
      });
    }

}
