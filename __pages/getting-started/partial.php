    <!-- Main Content -->
    <main class="main-content" style="margin-top:70px;">

      <div class="container">
        <div class="row">

          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Content
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <div class="col-md-7 col-xl-8 mr-md-auto py-8">
            <article>
              <h2 class="fw-200">Developing a new project starting from the expert starter</h2>
              <br>
              <p class="lead">It is a blank directory to make a copy of and start a new project with. It includes the required JS and CSS files from TheSaaS as well as icon fonts, PHP files and some images.</p>

              <br>
              <h6 class="fw-500">Sections in this article:</h6>
              <nav class="nav nav-toc-1 my-5">
                <a class="nav-link" href="#dep">Install dependencies</a>
                <a class="nav-link" href="#code">Write code</a>
                <a class="nav-link" href="#dist">Distribute</a>
              </nav>

              <hr>

              <h4 id="dep">Install dependencies</h4>
              <ol>
                <li><a href="https://nodejs.org/en/download">Download and install Node.js</a> if it's not installed on your machine</li>
                <li>Install the <a href="https://gulpjs.com/">Gulp</a> command line tools, <em>gulp-cli</em>, with <code>npm install gulp-cli -g</code></li>
                <li>Navigate to the root directory of your project and run <code>npm install</code> to install dependencies</li>
                <li>Run <code>gulp serve</code>.</li>
              </ol>

              <p>With the above command, a static web server starts in your browser which points to <em>/src</em> directory. It watch your files to reload the browser upon change to the HTML files, or JS and CSS files. Also, it watch your SCSS and JS files to compile them to page.min.css and page.min.js upon each change.</p>


              <hr class="hr-dash my-7">


              <h4 id="code">Write code</h4>
              <p>Time for development. Now you're ready to create your HTML files and writing your custom CSS and JS codes.</p>
              <p><mark class="small">- HTML</mark><br>Since most of the websites have a global layout for whole of the application, you might want to start modifying index.html file and create a global layout for your website. Check available layout features such as <a href="#">navbar</a>, <a href="#">header</a>, <a href="#">cover</a>, <a href="#">footer</a>, etc. as well as all the <a href="#">blocks</a> and <a href="#">UI Kit</a>.</p>
              <p><mark class="small">- SCSS</mark><br>Write your additional styles inside <code>/assets/scss/_style.scss</code>. Feel free to create more scss files and even subdirectories inside /scss folder to split your code to smaller chunks and import them inside <code>/scss/page.scss</code> file. Our Gulp task is watching all of the scss files inside /scss directory and recompile the page.min.css upon each change.</p>
              <p><mark class="small">- JavaScript</mark><br>Your additional JavaScript codes should be write inside <code>/assets/js/src/script.js</code>. Again, if you need to split your code to several JS files, simply create them inside /js/src directory and require them inside the <code>/js/src/page.js</code>. Our Gulp task is watching all of the JS files inside /js/src directory and recompile page.min.js after each change using Webpack.</p>


              <hr class="hr-dash my-7">


              <h4 id="dist">Distribute</h4>
              <p>Done with development? Run <code>gulp dist</code> to deploy your code inside <em>/dist</em> directory. This task simply remove unnecessary files (scss files, scss folder, unminified css and js files, etc.) in the /dist folder. Now you can use the /dist folder in your server side coding or upload to your web server.</p>

            </article>

            <div class="text-center mt-8">
              <hr class="hr-light">
              <p class="lead mb-0">How helpful was this article?</p>
              <nav class="nav nav-center lead-3 opacity-70">
                <a class="nav-link text-danger" href="#"><i class="fa fa-frown-o"></i></a>
                <a class="nav-link text-primary" href="#"><i class="fa fa-meh-o"></i></a>
                <a class="nav-link text-success" href="#"><i class="fa fa-smile-o"></i></a>
              </nav>
            </div>

          </div>


          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Sidebar
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <div class="col-md-4 col-xl-3 d-none d-md-block">
            <aside class="sidebar">
              <h6><strong>Related Articles</strong></h6>
              <ul class="nav flex-column">
                <li class="nav-item text-truncate">
                  <i class="fa fa-file-text-o mr-2"></i>
                  <a class="nav-link d-inline-block" href="#">How to get started?</a>
                </li>

                <li class="nav-item text-truncate">
                  <i class="fa fa-file-text-o mr-2"></i>
                  <a class="nav-link d-inline-block" href="#">How to update to a new version?</a>
                </li>

                <li class="nav-item text-truncate">
                  <i class="fa fa-file-text-o mr-2"></i>
                  <a class="nav-link d-inline-block" href="#">How to add a 3rd-party plugin?</a>
                </li>
              </ul>

              <hr>
<!-- 
              <h6><strong>Categories</strong></h6>
              <nav class="nav flex-column">
                <a class="nav-link" href="#">Manage Account</a>
                <a class="nav-link" href="#">Payments and billing</a>
                <a class="nav-link" href="#">Accessibility</a>
                <a class="nav-link" href="#">Integration</a>
                <a class="nav-link" href="#">Customization</a>
                <a class="nav-link" href="#">Migration</a>
              </nav> -->
            </aside>
          </div>

        </div>
      </div>

    </main><!-- /.main-content -->
