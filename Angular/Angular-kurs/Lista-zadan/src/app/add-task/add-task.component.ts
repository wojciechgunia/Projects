import { TaskService } from './../services/task.service';
import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { Task } from '../model/task';

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
    const task: Task = {name: this.newTask, created: new Date()}
    this.tasksTaskservice.addTask(task)
    this.newTask="";
  }

}
