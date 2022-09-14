import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AddTaskComponent } from './add-task/add-task.component';
import { TasksListComponent } from './tasks-list/tasks-list.component';
import { TasksDoneComponent } from './tasks-done/tasks-done.component';

@NgModule({
  declarations: [
    AppComponent,
    AddTaskComponent,
    TasksListComponent,
    TasksDoneComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
