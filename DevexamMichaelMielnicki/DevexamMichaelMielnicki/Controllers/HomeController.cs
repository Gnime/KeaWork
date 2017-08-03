using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using DevexamMichaelMielnicki.Models;
using Microsoft.AspNet.Identity;

namespace DevexamMichaelMielnicki.Controllers
{
    public class HomeController : Controller
    {
        private ApplicationDbContext db = new ApplicationDbContext();
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        public ActionResult CreateCompany()
        {
            return View();
        }
        [HttpPost]
        public ActionResult CreateCompany(Company Company)
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
            CurrentUser.CompanyId = Company.CompanyId;
            CurrentUser.Admin = true;
            Company.Employees.Add(CurrentUser);
            db.Companies.Add(Company);
            db.SaveChanges();



            return RedirectToAction("AdminDashboardView");

        }
        public ActionResult JoinExisistingCompany(string ReferenceCode)
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
            var CurrentCompany = db.Companies.Where(x => x.ReferenceCode == ReferenceCode).First();
            CurrentUser.CompanyId = CurrentCompany.CompanyId;
            CurrentCompany.Employees.Add(CurrentUser);
            db.SaveChanges();

            return RedirectToAction("UserDashboardView");
        }
        public ActionResult AdminDashboardView()
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();

            if (CurrentUser.Admin == true){

                //List<Skill> SkillFromDb = db.Skills.Where(x => x.CompanyId == CurrentUser.CompanyId).ToList();
                Company CompanyFromDb = db.Companies.Where(x => x.CompanyId == CurrentUser.CompanyId).First();
                AdminViewModel Avm = new AdminViewModel();
                Avm.Company = CompanyFromDb;
                //Avm.Skill = CompanyFromDb.Skill;
                return View(Avm);
            }else {
                return View("ErrorPage");
            }
            

        }
        [HttpPost]
        public ActionResult AdminDashboardView(AdminViewModel Avm)
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
            Company CompanyFromDb = db.Companies.Where(x => x.CompanyId == CurrentUser.CompanyId).First();
            Skill SkillFromViewModel = Avm.Skill;            
            SkillFromViewModel.CompanyId = CompanyFromDb.CompanyId;
            db.Skills.Add(SkillFromViewModel);
            db.SaveChanges();
            return RedirectToAction("AdminDashboardView");
        }

        public ActionResult UserDashboardView()
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
            UserViewModel Uvm = new UserViewModel();
            Uvm.Skills = db.Skills.Where(x => x.CompanyId == CurrentUser.CompanyId).Select(x => new SelectListItem { Value = x.SkillId.ToString(), Text = x.SkillName });
            Uvm.Company = db.Companies.Where(x => x.CompanyId == CurrentUser.CompanyId).First();
            Uvm.User = CurrentUser;         
            return View(Uvm);
        }
        [HttpPost]
        public ActionResult UserDashBoardView(UserViewModel Uvm)
        {
            var LoggedInUser = User.Identity.GetUserId();
            var CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
            Experience Experience = new Experience();
            Experience.Experiencename = Uvm.MasterLevel;
            Skill skill = db.Skills.Where(x => x.SkillId == Uvm.SelectedSkill).First();
            Experience.Skills = skill;
            Experience.Users = CurrentUser;
            db.Experiences.Add(Experience);
            db.SaveChanges();


            return RedirectToAction("UserDashBoardView");
        }

        public ActionResult SetFocus(int id) 
        {
            
           string LoggedInUser = User.Identity.GetUserId();
           var userFocus = db.Focus.Where(x => x.UserId == LoggedInUser).ToList();
    

            //Focus.SkillId = arrayOfSkills[0];

            if (userFocus.Count < 3) {
                    
                ApplicationUser CurrentUser = db.Users.Where(x => x.Id == LoggedInUser).First();
                Skill Skill = db.Skills.Where(x => x.SkillId == id).First();
                Focus Focus = new Focus();
                Focus.User = CurrentUser;
                Focus.Skill = Skill;
                db.Focus.Add(Focus);
                db.SaveChanges();

                return PartialView("_CurrentFocus", userFocus);
            }
            else{

                return PartialView("_CurrentFocus", userFocus);

            }
           
        

    }

    }
}