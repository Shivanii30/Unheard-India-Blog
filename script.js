fetch('blogs.json')
  .then(response => response.json())
  .then(data => {
    data.forEach(blog => {
      const blogCard = document.createElement('div');
      blogCard.classList.add('blog-card');
      blogCard.innerHTML = `
        <h2>${blog.title1}</h2>
        <p>Author: ${blog.author1}</p>
        <p>Date: ${blog.date1}</p>
        <p>${blog.content.substring(0, 150)}...</p>
        <a href="${blog.slug1}.html" class="read-more-btn">Read More</a>
      `;
      blogCard.innerHTML = `
      <h2>${blog.title2}</h2>
      <p>Author: ${blog.author2}</p>
      <p>Date: ${blog.date2}</p>
      <p>${blog.content.substring(0, 150)}...</p>
      <a href="${blog.slug2}.html" class="read-more-btn">Read More</a>
    `;
    blogCard.innerHTML = `
    <h2>${blog.title3}</h2>
    <p>Author: ${blog.author}</p>
    <p>Date: ${blog.date}</p>
    <p>${blog.content.substring(0, 150)}...</p>
    <a href="${blog.slug}.html" class="read-more-btn">Read More</a>
  `;
  blogCard.innerHTML = `
  <h2>${blog.title}</h2>
  <p>Author: ${blog.author}</p>
  <p>Date: ${blog.date}</p>
  <p>${blog.content.substring(0, 150)}...</p>
  <a href="${blog.slug}.html" class="read-more-btn">Read More</a>
`;
      document.getElementById('blog-container').appendChild(blogCard);
    });
  })
  .catch(error => console.error('Error fetching blog data:', error));
