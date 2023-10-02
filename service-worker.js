self.addEventListener('push', function(event) {
    const options = {
      body: event.data.text(),
      icon: 'notification-icon.png',
      badge: 'notification-badge.png',
    };
  
    event.waitUntil(
      self.registration.showNotification('Notification Title', options)
    );
  });