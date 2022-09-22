import { Directive, ElementRef, OnInit, Renderer2 } from '@angular/core';

@Directive({
  selector: '[appChecked]'
})
export class CheckedDirective implements OnInit{

  constructor(private el: ElementRef, private renderer: Renderer2) { }

  ngOnInit(): void
  {
    let elem = this.el.nativeElement;
    this.renderer.setStyle(elem, 'background-color', '#FFC054');
  }
}
