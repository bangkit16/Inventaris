const fs = require('cypress-fs');

module.exports = (on, config) => {
  // other plugins
  on('task', fs);

  on('task', {
    deleteFile(filePath) {
      return fs.unlinkSync(filePath);
    }
  });
};