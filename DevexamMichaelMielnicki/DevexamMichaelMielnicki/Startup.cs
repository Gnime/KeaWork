using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(DevexamMichaelMielnicki.Startup))]
namespace DevexamMichaelMielnicki
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
