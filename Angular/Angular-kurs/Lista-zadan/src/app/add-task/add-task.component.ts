import { TaskService } from './../services/task.service';
import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-add-task',
  templateUrl: './add-task.component.html',
})
export class AddTaskComponent implements OnInit
{

  newTask: string = "";

  constructor(private tasksTaskservice: TaskService)
  {

  }

  ngOnInit(): void
  {

  }

  addTask()
  {
    this.tasksTaskservice.addTask(this.newTask)
    this.newTask="";
  }

}
