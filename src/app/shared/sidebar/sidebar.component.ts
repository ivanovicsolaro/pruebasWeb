import { Component, OnInit, OnDestroy, ChangeDetectorRef, Input } from '@angular/core';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.sass']
})
export class SidebarComponent implements OnInit{
  opened: boolean;

  ngOnInit() {
    this.opened = false;
  }

  oponedNavMenu(event) {
    this.opened = event;
  }

}


