import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { BoloService } from 'src/app/app.service';
import { bolo } from 'src/app/bolo';

@Component({
  selector: 'app-update-bolo',
  templateUrl: './update-bolo.component.html',
  styleUrls: ['./update-bolo.component.css']
})
export class UpdateboloComponent implements OnInit {

  bolo?: any;
  form: FormGroup;
  showError = false;

  constructor(
    private service: BoloService, 
    private route: ActivatedRoute, 
    private router: Router
  ) {
    this.form = new FormGroup({
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
  }

  ngOnInit(): void {
    let id = this.route.snapshot.params['id'];
    this.service.getBolo(id).subscribe(data => {
      this.bolo = data;
      console.log('Fetched Bolo:', this.bolo);

      if (this.bolo) {
        this.form.patchValue({
          nome: this.bolo.nome,
          valor: this.bolo.valor,
          peso: this.bolo.peso,
          quantidade_disponivel: this.bolo.quantidade_disponivel
        });
      }
    }, error => {
      console.error('Error fetching bolo data', error);
    });
  }

  submit(): void {
    if (this.form.valid) {
      console.log('Form data:', this.form.value);


      this.service.updateBolo(this.bolo?.id, this.form.value).subscribe({
        next: (data) => {
          console.log('Updated Bolo:', data);
          this.router.navigate(['/']);
        },
        error: (error) => {
          console.error('Erro ao atualizar o bolo:', error);
          // Mostra o alerta de erro para o usuário
          this.showError = true;
          
          // Esconde o alerta após 5 segundos (opcional)
          setTimeout(() => {
            this.showError = false;
          }, 5000);
        }
      });
     
    } else {
      console.error('Form is invalid');
    }
  }
}
