import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class UtilsService {

  constructor() { }

  createModal(currentModal){
    document.getElementById('open-modal-inventory').style.cssText='display: block;';
    document.getElementById('add-'+currentModal+'-form').style.cssText='display: block;';
  }

  closeModal(currentModal){
    document.getElementById('open-modal-inventory').style.cssText='display: none;';
    document.getElementById('add-'+currentModal+'-form').style.cssText='display: none;';
  }

}
