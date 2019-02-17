import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  user:any;
  check:boolean=true;
    
  constructor()
   {
    
    this.user=
    {
    name:"Ann Dona James",
    designation:"student",
    address:"AJCE",
    phone:["7878787878","4545454545"]
    };
   }

    togglecheck(){
      this.check=!this.check;
    }
  ngOnInit() {
  }

}
