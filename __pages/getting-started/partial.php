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
              <p>
                <br/>
                <h5>1. Create a blueprint</h5>
                <p>You can create a blueprint using the command</p>
                <pre>
<code class="language-bash">
$ lesscode generate blueprint
</code>
</pre>
                <p>Then less-code will ask you to enter, a name for the app, the author and a version. For this example you can use "helloworld", "awesome developer" and "1.0" as the values.</p>
                <p>This will create a new file called blueprint.yml with the following contents;</p>
<pre>
<code class="language-yaml">
appName: "helloworld"
author : "awesome developer"
version: "1.0"
</code>
</pre>
              </p>
              <p>
                <br/>
                <h5>2. Create a hello world endpoint</h5>
                <p>To create a hello world endpoint, use the command</p> 
<pre>
<code class="language-bash">
$ lesscode generate view:helloworld
</code>
</pre>

                <p>Next the cli will ask for a name to print a greeting message. You can use the default value "awesome less-code developer" and continue.</p>
                <p>Less-code will add the following lines to the blueprint with the route GET '/helloworld'</p>
<pre>
<code class="language-yaml">
events:
    http:
        helloWorld:
            route: /helloworld
            method: GET
            urn: helloworld
            config:
                name: "awesome less-code developer"
</code>
</pre>

                <p>Less-code is based on a concept known as an atoms. Using the blueprint, you can add various behaviors for atoms and configure those behaviors. Each and every atom has a urn to uniquely identify them (in this example the urn is 'helloworld')</p>
                <p>Using a atom urn you can create an atom instance, and listen to various events that occur in less-code (in this example the 'helloWorld' atom instance listens to http events)</p>
                <p>Each atom instance can also be configured under the 'config' section of the instance.</p>
              </p>
              <p>
              <br/>
              <h5>3. Test the endpoint</h5>
              <p>To test the endpoints run the command</p> 
<pre>
<code class="language-bash">
$ lesscode run
</code>
</pre>
              <p>By default less code listens on port 5000. To test the endpoint you can use the command</p> 
<pre>
<code class="language-bash">
$ curl "http://localhost:5000/helloworld"
</code>
</pre>
              <p>The endpoint will respond with the following output;</p>
<pre>
<code class="language-json">
{
    "success": true,
    "response": "Hello, awesome less-code developer!. Welcome to the awesome journey of less-code.io!!!",
    "error": null,
    "message": null
}
</code>
</pre>

              <hr class="hr-dash my-7">
              
              <h4 id="dist">Explore our features</h4>
              <p>Less-code.io is designed for enterprise grade API development. In our current version we are providing you the features to write CRUD applications, python scripting, and JWT based autorization.</p>
              <p>Checkout our <a href="tutorials">tutorials</a> to explore more features.</p>
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
