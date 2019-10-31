import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.sass']
})
export class HeaderComponent implements OnInit {
  opened = false;
  @Output() changeStateNavMenu = new EventEmitter<boolean>();
  constructor() { }

  ngOnInit() {
  }

  navToggle() {
    this.opened = !this.opened;
    this.changeStateNavMenu.emit(this.opened);
  }

}
