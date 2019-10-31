import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.sass']
})
export class DashboardComponent implements OnInit {
  activeTab = 'timeline';

  constructor() { }

  ngOnInit() {
  }

  openTab(tabName) {
    this.activeTab = tabName;
  }

}
