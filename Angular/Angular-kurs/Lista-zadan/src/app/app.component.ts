import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {


  newTask: string = "";
  Tasks: Array<string> = [];
  TasksDone: Array<string> = [];


  addTask()
  {
    this.Tasks.push(this.newTask);
    this.newTask="";
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
