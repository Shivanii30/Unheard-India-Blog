document.addEventListener("DOMContentLoaded", function() {
  fetch("blogs.json")
      .then(response => response.json())
      .then(data => {
          const blogContent = document.getElementById("blog-content");
          data.forEach(blog => {
              const blogPost = document.createElement("div");
              blogPost.classList.add("blog-item");

              const blogImg = document.createElement("img");
              blogImg.src = blog.image;
              blogImg.alt = blog.title;

              const blogText = document.createElement("div");
              blogText.classList.add("blog-text");

              const title = document.createElement("h2");
              title.textContent = blog.title;

              const author = document.createElement("p");
              author.textContent = "Author: " + blog.author;

              const date = document.createElement("p");
              date.textContent = "Date: " + blog.date;

              const content = document.createElement("p");
              content.textContent = blog.content;

              blogText.appendChild(title);
              blogText.appendChild(author);
              blogText.appendChild(date);
              blogText.appendChild(content);

              blogPost.appendChild(blogImg);
              blogPost.appendChild(blogText);

              blogContent.appendChild(blogPost);
          });
      })
      .catch(error => {
          console.error("Error fetching blog data:", error);
      });
});
