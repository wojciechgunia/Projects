import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { BehaviorSubject } from 'rxjs';

@Injectable()

export class TaskService
{

  private Tasks: Array<string> = [];
  private TasksDone: Array<string> = [];

  private TasksObs = new BehaviorSubject<Array<string>>([]);
  private TasksDoneObs = new BehaviorSubject<Array<string>>([]);

  constructor()
  {

  }

  getTasksObs(): Observable<Array<string>>
  {
    return this.TasksObs.asObservable();
  }

  getTasksDoneObs(): Observable<Array<string>>
  {
    return this.TasksDoneObs.asObservable();
  }

  addTask(newTask: string)
  {
    this.Tasks.push(newTask);
    this.TasksObs.next(this.Tasks);
  }

  delTask(task: string)
  {
    this.Tasks=this.Tasks.filter(e => e!==task);
    this.TasksObs.next(this.Tasks);
  }

  completeTask(task: string)
  {
    this.delTask(task);
    this.TasksDone.push(task);
    this.TasksDoneObs.next(this.TasksDone);
  }
}
