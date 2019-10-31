import { Component, OnInit } from '@angular/core';
declare function initJs();

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: [ './login.component.sass']
})
export class LoginComponent implements OnInit {

  constructor() {
    initJs();
  }

  ngOnInit() {
  }

}
