import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {


  Tasks: Array<string> = [];
  TasksDone: Array<string> = [];


  addTask(newTask: string)
  {
    this.Tasks.push(newTask);
  }

  delTask(task: string)
  {
    this.Tasks=this.Tasks.filter(e => e!==task);
  }

  completeTask(task: string)
  {
    this.delTask(task);
    this.TasksDone.push(task);
  }

}
