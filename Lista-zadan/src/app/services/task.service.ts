import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { BehaviorSubject } from 'rxjs';
import { Task } from '../model/task';

@Injectable()

export class TaskService
{

  private Tasks: Array<Task> = [];
  private TasksDone: Array<Task> = [];

  private TasksObs = new BehaviorSubject<Array<Task>>([]);
  private TasksDoneObs = new BehaviorSubject<Array<Task>>([]);

  constructor()
  {

  }

  getTasksObs(): Observable<Array<Task>>
  {
    return this.TasksObs.asObservable();
  }

  getTasksDoneObs(): Observable<Array<Task>>
  {
    return this.TasksDoneObs.asObservable();
  }

  addTask(newTask: Task)
  {
    this.Tasks.push(newTask);
    this.TasksObs.next(this.Tasks);
  }

  delTask(task: Task)
  {
    this.Tasks=this.Tasks.filter(e => e!==task);
    this.TasksObs.next(this.Tasks);
  }

  completeTask(task: Task)
  {
    this.delTask(task);
    this.TasksDone.push(task);
    this.TasksDoneObs.next(this.TasksDone);
  }
}
