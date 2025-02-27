import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { bolo } from 'src/app/bolo';
import { BoloService } from '../../app.service';

@Component({
  selector: 'app-view-bolo',
  templateUrl: './view-bolo.component.html',
  styleUrls: ['./view-bolo.component.css']
})
export class ViewboloComponent {
  bolos: any | undefined;

  constructor(private boloService: BoloService) { 
   
  }

  ngOnInit(): void {
    this.boloService.getBolos().subscribe(data => {
      this.bolos = data;
      console.log(data)
    });
  }

  deleteBolo(id: number) {
    this.boloService.deleteBolo(id).subscribe(data => {
      console.log(data);
      this.ngOnInit();
    });
  }

}
