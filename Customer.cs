using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.ComponentModel.DataAnnotations;


namespace MVCdatabase.Models
{
    public class Customer
    {
        public int CustomerId { get; set; }
        [Required(ErrorMessage = "Cant be empty")]
        [Display(Name = "Name")]
        //[RegularExpression()]
        public string Sname { get; set; }
        [Required(ErrorMessage = "Cant be empty")]
        [Display(Name = "Address")]
        [DataType(DataType.MultilineText)]
        public string Saddress { get; set; }
        [Required(ErrorMessage = "Cant be empty")]
        [Display(Name = "Email")]

        public string Semail { get; set; }


        [Required(ErrorMessage = "Cant be empty")]
        [Display(Name = "User Name")]
        public string Username { get; set; }

        [Required(ErrorMessage = "Cant be empty")]
        [Display(Name = "Password")]
        public string Password { get; set; }


    }
}