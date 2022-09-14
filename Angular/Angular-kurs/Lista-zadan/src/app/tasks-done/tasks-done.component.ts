import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-tasks-done',
  templateUrl: './tasks-done.component.html',
})
export class TasksDoneComponent implements OnInit {

  @Input()
  TasksDone = [""];


  constructor() { }

  ngOnInit(): void {
  }

}
