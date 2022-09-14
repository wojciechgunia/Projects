import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-tasks-list',
  templateUrl: './tasks-list.component.html',
})
export class TasksListComponent implements OnInit {

  @Input()
  Tasks = [""];

  @Output()
  emitDel = new EventEmitter<string>();

  @Output()
  emitCom = new EventEmitter<string>();


  constructor() { }

  ngOnInit(): void {
  }

  delTask(task: string)
  {
    this.emitDel.emit(task);
  }

  completeTask(task: string)
  {
    this.emitCom.emit(task);
  }

}
