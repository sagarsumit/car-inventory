import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpRequest } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Model } from '../model/model';


@Injectable({
  providedIn: 'root'
})
export class ModelService {
  
  private url: string = "http://127.0.0.1/projects/car-inventory/data/getModels.php";
  
  constructor(private http: HttpClient) { }

  getModel(): Observable<Model[]>{
    return this.http.get<Model[]>(this.url);
  }
/*
  errorHandler(error: HttpErrorResponse){
    return Observable.throw(error.message || "Server Error");
  }*/
}
