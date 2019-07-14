import { Component, OnInit } from '@angular/core';
import { UtilsService } from '../services/utils.service';
import { ModelService } from '../services/model.service';

@Component({
  selector: 'app-model',
  templateUrl: '../html/model.component.html',
  styleUrls: ['../css/model.component.css']
})
export class ModelComponent implements OnInit {

  public modelList = [];
  public errorMessage;
  constructor(private utils: UtilsService, private model: ModelService) { }

  ngOnInit() {
    this.model.getModel().subscribe(data => this.modelList = data);//, this.errorMessage=error);
  }

  openModal(currentModal){
    this.utils.createModal(currentModal);
  }

}
