using System.Data.Entity;
using System.Security.Claims;
using System.Threading.Tasks;
using Microsoft.AspNet.Identity;
using Microsoft.AspNet.Identity.EntityFramework;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System;

namespace DevexamMichaelMielnicki.Models
{
    // You can add profile data for the user by adding more properties to your ApplicationUser class, please visit http://go.microsoft.com/fwlink/?LinkID=317594 to learn more.
    public class ApplicationUser : IdentityUser
    {
        public async Task<ClaimsIdentity> GenerateUserIdentityAsync(UserManager<ApplicationUser> manager)
        {
            // Note the authenticationType must match the one defined in CookieAuthenticationOptions.AuthenticationType
            var userIdentity = await manager.CreateIdentityAsync(this, DefaultAuthenticationTypes.ApplicationCookie);
            // Add custom user claims here
            return userIdentity;
        }

        public virtual Company Company { get; set; }
        public virtual ICollection<Experience> Experience { get; set; }
        public int? CompanyId { get; set; }
        public string Name { get; set; }
        public string Img { get; set; }
        public bool Admin { get; set; }
        public virtual ICollection<Focus> Focus { get; set; }

    }

    public class ApplicationDbContext : IdentityDbContext<ApplicationUser>
    {
        public ApplicationDbContext()
            : base("DefaultConnection", throwIfV1Schema: false)
        {
        }

        public static ApplicationDbContext Create()
        {
            return new ApplicationDbContext();
        }
        public DbSet<Company> Companies { get; set; }
        public DbSet<Skill> Skills { get; set; }
        public DbSet<Experience> Experiences { get; set; }
        public DbSet<Focus> Focus { get; set; }
    }
    public class Company
    {
        public int CompanyId { get; set; }
        public string Name { get; set; }
        public virtual ICollection<ApplicationUser> Employees { get; set; }
        public virtual ICollection<Skill> Skills { get; set; }
        public string Img { get; set; }
        public string ReferenceCode { get; set; }
        public Company()
        {
            this.Employees = new List<ApplicationUser>();
            this.Skills = new List<Skill>();
            this.ReferenceCode = Guid.NewGuid().ToString();
        }
    }
    public class Skill
    {
        public int SkillId { get; set; }
        public int CompanyId { get; set; }
        public string Description { get; set; }
        public string SkillName { get; set; }   
        public virtual Company Company { get; set; }
        public virtual ICollection<Experience> Experience { get; set; }
    }


    public class Experience
    {
        public int Experienceid { get; set; }
        public int Experiencename { get; set; }
        public virtual ApplicationUser Users { get; set; }
        public virtual Skill Skills { get; set; }
       
    
    }
    public class Focus
    {
        public int FocusId { get; set; }
        public virtual Skill Skill { get; set; }
        public virtual ApplicationUser User { get; set; }
        public  int SkillId { get; set; }
        public string UserId { get; set; }

    }
    
} 