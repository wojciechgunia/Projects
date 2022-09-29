import { Directive, ElementRef, HostListener, Input, Renderer2 } from '@angular/core';

@Directive({
  selector: '[appDate]'
})
export class DateDirective {

  @Input()
  date: any;

  private div=this.renderer.createElement('div');

  constructor(private el: ElementRef, private renderer: Renderer2) { }

  @HostListener('mouseenter')
  mouseenter(eventDate: Event)
  {
    this.div.innerHTML = this.date.toLocaleDateString();
    this.div.style.fontSize = "0.8rem";
    this.renderer.appendChild(this.el.nativeElement, this.div);
  }

  @HostListener('mouseleave')
  mouseleave(eventDate: Event)
  {
    this.div.innerHTML = this.date;
    this.renderer.removeChild(this.el.nativeElement, this.div);
  }
}
