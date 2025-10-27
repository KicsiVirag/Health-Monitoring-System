using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using SeleniumExtras.WaitHelpers;
using System.Runtime.CompilerServices;
using System.ComponentModel;

namespace SeleniumTest
{
    [TestClass]
    public class SeleniumTests
    {
        private WebDriver driver;
        private const string _sut = "http://localhost:5173/";

        [TestInitialize]
        public void InitializeWebDriver()
        {
            var chromeOptions = new ChromeOptions();
            driver = new ChromeDriver(chromeOptions);
        }
        [TestCleanup]
        public void CleanupWebDriver()
        {
            driver.Quit();
        }

        private IWebElement? Navigate(string linkName)
        {
            var navigationElemnets = driver.FindElements(By.CssSelector(".navbar .container-fluid .collapse .navbar-nav .nav-item"));
            foreach (var element in navigationElemnets)
            {
                if(linkName == element.Text)
                {
                    return element;
                }
            }
            return null;
        }
        [TestMethod]
        public void MainPageTitleIsCorrect()
        {
            driver.Url = _sut;
            Assert.AreEqual("Fõoldal",driver.Title);
        }
        [TestMethod]
        public void EatingPageTitleAndURLIsCorrect()
        {
            driver.Url = _sut;
            Navigate("Étkezés")!.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/eating", driver.Url);
            Assert.AreEqual("Táplálkozás", driver.Title);
        }
        [TestMethod]
        public void TrainingPageTitleAndURLIsCorrect()
        {
            driver.Url = _sut;
            Navigate("Edzés")!.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/training", driver.Url);
            Assert.AreEqual("Mozgás", driver.Title);
        }
        [TestMethod]
        public void SleepPageTitleAndURLIsCorrect()
        {
            driver.Url = _sut;
            Navigate("Alvás")!.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/sleep", driver.Url);
            Assert.AreEqual("Alvás", driver.Title);
        }
        [TestMethod]
        public void OtherPageTitleAndURLIsCorrect()
        {
            driver.Url = _sut;
            Navigate("Vérnyomás és pulzus")!.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/other", driver.Url);
            Assert.AreEqual("Pulzus és vérnyomás", driver.Title);
        }

        [TestMethod]
        public void LogInOperation()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Szeretnél egészséges lenni mint a makk?", h1Title.Text);
        }
        [TestMethod]
        public void LoadingSummaryPage()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Navigate("Eddigi méréseid").Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Eddigi méréseid", h1Title.Text);
        }
        [TestMethod]
        public void EditPageNavigationFromEatingTable()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Navigate("Eddigi méréseid").Click();
            var Submit_Button = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("eating_Submit_Button")));
            Submit_Button.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Napi mérés", h1Title.Text);
        }
        [TestMethod]
        public void EditPageNavigationFromTrainingTable()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Navigate("Eddigi méréseid").Click();
            var Submit_Button = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("training_Submit_Button")));
            Submit_Button.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Napi mérés", h1Title.Text);
        }
        [TestMethod]
        public void EditPageNavigationFromSleepTable()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Navigate("Eddigi méréseid").Click();
            var Submit_Button = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("sleep_Submit_Button")));
            Submit_Button.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Napi mérés", h1Title.Text);
        }
        [TestMethod]
        public void EditPageNavigationFromMeasureTable()
        {
            driver.Url = $"{_sut}log-in";
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var email = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("email")));
            var password = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("password")));
            email.SendKeys("Test@example.com");
            password.SendKeys("12345Aa!");
            var loginButton = driver.FindElement(By.Id("input_1"));
            loginButton.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Navigate("Eddigi méréseid").Click();
            var Submit_Button = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("measure_Submit_Button")));
            Submit_Button.Click();
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            var h1Title = driver.FindElement(By.TagName("h1"));
            Assert.AreEqual("Napi mérés", h1Title.Text);
        }
        [TestMethod]
        public void RegistrationPageTitleAndURLIsCorrect()
        {
            driver.Url = $"{_sut}sign-in";
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/sign-in", driver.Url);
            Assert.AreEqual("Regisztráció", driver.Title);
        }

        [TestMethod]
        public void LoginPageTitleAndURLIsCorrect()
        {
            driver.Url = $"{_sut}log-in";
            System.Threading.Thread.Sleep(TimeSpan.FromSeconds(5));
            Assert.AreEqual("http://localhost:5173/log-in", driver.Url);
            Assert.AreEqual("Bejelentkezés", driver.Title);
        }

        [TestMethod]
        public void LoginPageElementsArePresent()
        {
            driver.Url = $"{_sut}log-in";
            var emailInput = driver.FindElement(By.Id("email"));
            var passwordInput = driver.FindElement(By.Id("password"));
            var loginButton = driver.FindElement(By.Id("submit"));
            Assert.IsNotNull(emailInput);
            Assert.IsNotNull(passwordInput);
            Assert.IsNotNull(loginButton);
        }

        [TestMethod]
        public void RegistrationPageElementsArePresent()
        {
            driver.Url = $"{_sut}sign-in";
            var usernameInput = driver.FindElement(By.Id("username"));
            var nameInput = driver.FindElement(By.Id("name"));
            var emailInput = driver.FindElement(By.Id("email"));
            var passwordInput = driver.FindElement(By.Id("password"));
            var confirmPasswordInput = driver.FindElement(By.Id("confirmPassword"));
            var birthDateInput = driver.FindElement(By.Id("birth_date"));
            var genderInput = driver.FindElement(By.Id("gender"));
            var submitButton = driver.FindElement(By.CssSelector(".btn.btn-success"));
            Assert.IsNotNull(usernameInput);
            Assert.IsNotNull(nameInput);
            Assert.IsNotNull(emailInput);
            Assert.IsNotNull(passwordInput);
            Assert.IsNotNull(confirmPasswordInput);
            Assert.IsNotNull(birthDateInput);
            Assert.IsNotNull(genderInput);
            Assert.IsNotNull(submitButton);
        }

        [TestMethod]
        public void MainPageElementsArePresent()
        {
            driver.Url = _sut;
            var navbar = driver.FindElement(By.CssSelector(".navbar"));
            var homeLink = driver.FindElement(By.LinkText("OPK"));
            var eatingLink = driver.FindElement(By.LinkText("Étkezés"));
            var trainingLink = driver.FindElement(By.LinkText("Edzés"));
            var sleepLink = driver.FindElement(By.LinkText("Alvás"));
            var otherLink = driver.FindElement(By.LinkText("Vérnyomás és pulzus"));
            Assert.IsNotNull(navbar);
            Assert.IsNotNull(homeLink);
            Assert.IsNotNull(eatingLink);
            Assert.IsNotNull(trainingLink);
            Assert.IsNotNull(sleepLink);
            Assert.IsNotNull(otherLink);
        }

        [TestMethod]
        public void RegisterWithValidCredentials()
        {
            driver.Url = $"{_sut}sign-in";
            Thread.Sleep(2000);
            var wait = new WebDriverWait(driver, TimeSpan.FromSeconds(10));
            var usernameField = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("username")));
            driver.FindElement(By.Id("username")).SendKeys("TestUser2");
            driver.FindElement(By.Id("name")).SendKeys("UserTest2");
            driver.FindElement(By.Id("email")).SendKeys("Test@examplee.com");
            driver.FindElement(By.Id("password")).SendKeys("12345Aa!");
            driver.FindElement(By.Id("confirmPassword")).SendKeys("12345Aa!");
            driver.FindElement(By.Id("birth_date")).SendKeys("1999-01-01");
            var genderSelect = new SelectElement(driver.FindElement(By.Id("gender")));
            genderSelect.SelectByValue("nõ");
            
            driver.FindElement(By.Id("submit")).Click();

            var weightField = wait.Until(ExpectedConditions.ElementIsVisible(By.Id("weight")));

            driver.FindElement(By.Id("weight")).SendKeys("55");
            driver.FindElement(By.Id("height")).SendKeys("170");
            driver.FindElement(By.Id("date")).SendKeys("2024-04-04");

            driver.FindElement(By.Id("submit2")).Click();

            Assert.AreEqual("http://localhost:5173/sign-in", driver.Url);
        }
    }
}