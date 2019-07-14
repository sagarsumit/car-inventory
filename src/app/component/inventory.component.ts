import { Component, OnInit } from '@angular/core';
import { UtilsService } from '../services/utils.service';

@Component({
  selector: 'app-inventory',
  templateUrl: '../html/inventory.component.html',
  styleUrls: ['../css/inventory.component.css']
})
export class InventoryComponent implements OnInit {

  constructor(private utils: UtilsService) { }

  ngOnInit() {
  }

  openModal(currentModal){
    this.utils.createModal(currentModal);
  }
}
