import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { InventoryComponent } from './component/inventory.component';
import { ManufacturerComponent } from './component/manufacturer.component';
import { ModelComponent } from './component/model.component';
import { PageNotFoundComponent } from './component/page-not-found.component';


const routes: Routes = [
  { path: '', component: InventoryComponent},
  { path: 'inventory', component: InventoryComponent},
  { path: 'manufacturer', component: ManufacturerComponent},
  { path: 'model', component: ModelComponent},
  { path: 'error-404', component: PageNotFoundComponent},
  { path: '**', redirectTo: 'error-404'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
export const routingComponents =  [
                                    InventoryComponent,
                                    ManufacturerComponent,
                                    ModelComponent,
                                    PageNotFoundComponent
                                  ];