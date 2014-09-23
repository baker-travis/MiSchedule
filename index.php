<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/common.css" />
  <title>Scheduling Home</title>

</head>
<body>

<section class='container'>
          <hgroup>
            <h1>BYU-Idaho Support Center Schedule</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
          </hgroup>


      <div class="row table-responsive" id="schedule calendar">
         <table class="table">
            <tr class="dates">
               <th>Monday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
               <th>Tuesday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
               <th>Wednesday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
               <th>Thursday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
               <th>Friday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
               <th>Saturday<br />dummy date</th> <!-- need to change dummy date to be selective with the current date.-->
            </tr>
            <tr class="station">
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
               <td>Biddulph 1</td> <!-- This needs to be programmatically placed -->
            </tr>
            <tr class="employees">
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
               <td>9am - 11am</td> <!-- This needs to be programmatically placed -->
            </tr>
         </table>
      </div>

        <div class="row"> 
          <section class='col-xs-12 col-sm-6 col-md-6'>
            <section>
              <h2>Deploying code changes</h2>
                <p>OpenShift uses the <a href="http://git-scm.com/">Git version control system</a> for your source code, and grants you access to it via the Secure Shell (SSH) protocol. In order to upload and download code to your application you need to give us your <a href="https://www.openshift.com/developers/remote-access">public SSH key</a>. You can upload it within the web console or install the <a href="https://www.openshift.com/developers/rhc-client-tools-install">RHC command line tool</a> and run <code>rhc setup</code> to generate and upload your key automatically.</p>

                <h3>Working in your local Git repository</h3>
                <p>If you created your application from the command line and uploaded your SSH key, rhc will automatically download a copy of that source code repository (Git calls this 'cloning') to your local system.</p>

                <p>If you created the application from the web console, you'll need to manually clone the repository to your local system. Copy the application's source code Git URL and then run:</p>

<pre>$ git clone &lt;git_url&gt; &lt;directory_to_create&gt;

# Within your project directory
# Commit your changes and push to OpenShift

$ git commit -a -m 'Some commit message'
$ git push</pre>


                  <ul>
                    <li><a href="https://www.openshift.com/developers/deploying-and-building-applications">Learn more about deploying and building your application</a></li>
                    <li><a href="http://openshift.github.io/documentation/oo_cartridge_guide.html#php">Read more details about Repository Layout, Action Hooks and Markers</a></li>
                  </ul>
            </section>

          </section>
          <section class="col-xs-12 col-sm-6 col-md-6">

                <h2>Managing your application</h2>

                <h3>Web Console</h3>
                <p>You can use the OpenShift web console to enable additional capabilities via cartridges, add collaborator access authorizations, designate custom domain aliases, and manage domain memberships.</p>

                <h3>Command Line Tools</h3>
                <p>Installing the <a href="https://www.openshift.com/developers/rhc-client-tools-install">OpenShift RHC client tools</a> allows you complete control of your cloud environment. Read more on how to manage your application from the command line in our <a href="https://www.openshift.com/user-guide">User Guide</a>.
                </p>

                <h2>Development Resources</h2>
                  <ul>
                    <li><a href="https://www.openshift.com/developers">Developer Center</a></li>
                    <li><a href="https://www.openshift.com/user-guide">User Guide</a></li>
                    <li><a href="https://www.openshift.com/support">OpenShift Support</a></li>
                    <li><a href="http://stackoverflow.com/questions/tagged/openshift">Stack Overflow questions for OpenShift</a></li>
                    <li><a href="http://webchat.freenode.net/?randomnick=1&channels=openshift&uio=d4">IRC channel at #openshift on freenode.net</a></li>
                    <li><a href="http://git-scm.com/documentation">Git documentation</a></li>
                  </ul>


          </section>
        </div>


        <footer>
          <div class="logo"><a href="https://www.openshift.com/"></a></div>
        </footer>
</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
