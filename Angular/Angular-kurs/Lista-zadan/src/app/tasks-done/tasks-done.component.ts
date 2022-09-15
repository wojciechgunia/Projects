import { Component, Input, OnInit } from '@angular/core';
import { TaskService } from '../services/task.service';

@Component({
  selector: 'app-tasks-done',
  templateUrl: './tasks-done.component.html',
})
export class TasksDoneComponent implements OnInit
{

  TasksDone = [""];


  constructor(private tasksTaskservice: TaskService)
  {
    this.tasksTaskservice.getTasksDoneObs().subscribe((tasks: Array<string>)=>{ this.TasksDone=tasks });
  }

  ngOnInit(): void
  {

  }

}
