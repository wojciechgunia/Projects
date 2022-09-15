import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
import { TaskService } from '../services/task.service';

@Component({
  selector: 'app-tasks-list',
  templateUrl: './tasks-list.component.html',
})
export class TasksListComponent implements OnInit
{

  Tasks = [""];



  constructor(private tasksTaskservice: TaskService)
  {
    this.tasksTaskservice.getTasksObs().subscribe((tasks: Array<string>)=>{ this.Tasks=tasks});
  }

  ngOnInit(): void
  {

  }

  delTask(task: string)
  {
    this.tasksTaskservice.delTask(task);
  }

  completeTask(task: string)
  {
    this.tasksTaskservice.completeTask(task);
  }

}
