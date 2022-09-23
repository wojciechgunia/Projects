import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
import { TaskService } from '../services/task.service';
import { Task } from '../model/task';

@Component({
  selector: 'app-tasks-list',
  templateUrl: './tasks-list.component.html',
})
export class TasksListComponent implements OnInit
{

  Tasks: Array<Task> = [];



  constructor(private tasksTaskservice: TaskService)
  {
    this.tasksTaskservice.getTasksObs().subscribe((tasks: Array<Task>)=>{ this.Tasks=tasks.slice()});
  }

  ngOnInit(): void
  {

  }

  delTask(task: Task)
  {
    this.tasksTaskservice.delTask(task);
  }

  completeTask(task: Task)
  {
    task.end = new Date();
    this.tasksTaskservice.completeTask(task);
  }

}
