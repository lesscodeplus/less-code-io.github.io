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
              <h2 class="fw-200">Getting started</h2>
              <br>
              <p class="lead">Its pretty simple, just install and play around!</p>

              <!-- <br>
              <h6 class="fw-500">Sections in this article:</h6>
              <nav class="nav nav-toc-1 my-5">
                <a class="nav-link" href="#dep">Install dependencies</a>
                <a class="nav-link" href="#code">Write code</a>
                <a class="nav-link" href="#dist">Distribute</a>
              </nav> -->

              <hr>

              <h4 id="dep">Install less-code</h4>
              <ol>
                <li><a href="https://dotnet.microsoft.com/download">Download and install .NET core Runtime 2.2</a> if it's not installed on your machine</li>
                <li>Download less-code from our <a href="download">download</a> page.</li>
                <li>Extract the zip file and it is done</li>
              </ol>


              <hr class="hr-dash my-7">


              <h4 id="code">Write a hello world API</h4>
              <p>
                Less-code APIs are built on 'blueprints' which is a YAML file that defines all your endpoints, database schemas, and how each endpoint works. Using less-code CLI scaffolding you can easily add various elements to your blueprint.
              </p>
              <p><mark class="small">1. Create a blueprint</mark><br>
                You can create a blueprint using the command <code>lesscode generate blueprint</code>. Next you have to enter the auther name, and the version of the API. This will create a default blueprint.yml file. 
                
              </p>
              <p><mark class="small">2. Create a hello world endpoint</mark><br>
                To create a hello world endpoint, use the command <code>lesscode generate view:helloworld</code>.
              </p>
              <p><mark class="small">3. Test the endpoint</mark><br>
              To test the endpoints run the command <code>lesscode run</code>.

              <hr class="hr-dash my-7">
              
              <h4 id="dist">Checkout more advanced features</h4>
              <p>
                Less-code.io is designed for enterprise grade API development. In our current version we are providing you the features to write CRUD applications, python scripting, and JWT based autorization. We have planned to include so many feature in our roadmap that will not only help you write APIs with less-code but to support full stack low code development
              </p>

            </article>

            <!-- <div class="text-center mt-8">
              <hr class="hr-light">
              <p class="lead mb-0">How helpful was this article?</p>
              <nav class="nav nav-center lead-3 opacity-70">
                <a class="nav-link text-danger" href="#"><i class="fa fa-frown-o"></i></a>
                <a class="nav-link text-primary" href="#"><i class="fa fa-meh-o"></i></a>
                <a class="nav-link text-success" href="#"><i class="fa fa-smile-o"></i></a>
              </nav>
            </div> -->

          </div>


          <!--
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          | Sidebar
          |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
          !-->
          <!-- <div class="col-md-4 col-xl-3 d-none d-md-block">
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

              <h6><strong>Categories</strong></h6>
              <nav class="nav flex-column">
                <a class="nav-link" href="#">Manage Account</a>
                <a class="nav-link" href="#">Payments and billing</a>
                <a class="nav-link" href="#">Accessibility</a>
                <a class="nav-link" href="#">Integration</a>
                <a class="nav-link" href="#">Customization</a>
                <a class="nav-link" href="#">Migration</a>
              </nav>
            </aside>
          </div> -->

        </div>
      </div>

    </main><!-- /.main-content -->
