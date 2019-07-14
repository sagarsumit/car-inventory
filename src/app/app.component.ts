import { Component } from '@angular/core';
import { UtilsService } from './services/utils.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'carinventory';

  constructor(private utils: UtilsService){}
  closeModal(currentModal){
    this.utils.closeModal(currentModal);
  }
}
