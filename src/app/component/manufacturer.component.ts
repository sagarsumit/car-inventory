import { Component, OnInit } from '@angular/core';
import { UtilsService } from '../services/utils.service';

@Component({
  selector: 'app-manufacturer',
  templateUrl: '../html/manufacturer.component.html',
  styleUrls: ['../css/manufacturer.component.css']
})
export class ManufacturerComponent implements OnInit {

  constructor(private utils: UtilsService) { }

  ngOnInit() {
  }

  openModal(currentModal){
    this.utils.createModal(currentModal);
  }
  
}
