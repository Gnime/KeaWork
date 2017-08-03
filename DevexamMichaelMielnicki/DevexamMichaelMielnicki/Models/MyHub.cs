using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Microsoft.AspNet.SignalR;

namespace DevexamMichaelMielnicki.Models
{
    public class MyHub : Hub
    {
        public void newEmployee()
        {
            string userName = Context.User.Identity.Name;
            Clients.All.newEmployee(userName);
        }
    }
}