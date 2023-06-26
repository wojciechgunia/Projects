import { Component, Input, OnInit } from '@angular/core';
import { TaskService } from '../services/task.service';
import { Task } from '../model/task';

@Component({
  selector: 'app-tasks-done',
  templateUrl: './tasks-done.component.html',
  styleUrls: ['./tasks-done.component.css']
})
export class TasksDoneComponent implements OnInit
{

  TasksDone: Array<Task> = [];


  constructor(private tasksTaskservice: TaskService)
  {
    this.tasksTaskservice.getTasksDoneObs().subscribe((tasks: Array<Task>)=>{ this.TasksDone=tasks.slice() });
  }

  ngOnInit(): void
  {

  }

}
